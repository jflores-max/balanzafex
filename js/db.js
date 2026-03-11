function openDb(dbName,dbVersion,dbDescription,dbSize){
  if(!isApp){
    return window.openDatabase(dbName, dbVersion, dbDescription, dbSize);
  }
  return (window.cordova.platformId === 'browser') ? window.openDatabase(dbName, dbVersion, dbDescription, dbSize) : window.sqlitePlugin.openDatabase({name: `${dbName}.db`, location: 'default'});
}

function getCurrentDate() {
  var date = new Date();
  var d = date.getDate();
  var m = date.getMonth() + 1;
  var y = date.getFullYear();
  return y + '_' + (m<=9 ? '0' + m : m) + '_' + (d <= 9 ? '0' + d : d);
}
function getFullDate(){
  var date = new Date();
  var a = date.getHours();
  var b = date.getMinutes();
  var c = date.getSeconds();
  var d = date.getDate();
  var m = date.getMonth() + 1;
  var y = date.getFullYear();
  return y + '-' + (m<=9 ? '0' + m : m) + '-' + (d <= 9 ? '0' + d : d)+' ' + (a <= 9 ? '0' + a : a) + ":" + (b <= 9 ? '0' + b : b)+ ":" + (c <= 9 ? '0' + c : c);
}
function log(cad){
  if(!isApp){
    console.log(cad);
    return;
  }
  if(window.cordova.platformId === 'browser'){
    console.log(cad);
  }else{
    //document.querySelector('#deviceready').innerHTML+=cad+'\n';
    document.addEventListener('deviceready', function(){
    createFile(`log_${getCurrentDate()}.txt`,`[${getFullDate()}]=>${cad}\n`,function(){});
  }, false);
  }
}

var html5sql = (function () {
  var readTransactionAvailable = false;
  var doNothing = function () {};
  var emptyArray = [];
  var html5sql = {
    database: null,
    logInfo: false,
    logErrors: true,
    putSelectResultsInArray: true,
    defaultFailureCallback: doNothing
  };
  function trim(string) {
    return string.replace(/^\s+/, "").replace(/\s+$/, "");
  }
  function isArray(obj) {
    return Object.prototype.toString.call(obj) === '[object Array]';
  }
  function isUndefined(obj) {
    return obj === void 0;
  }
  var isSelectStatementRegex = new RegExp('^select\\s', 'i');
  function isSelectStmt(sqlstring) {
    return isSelectStatementRegex.test(sqlstring);
  };
  function allStatementsAreSelectOnly(SQLObjects) {
    var i = 0;
    do {
      if (!isSelectStmt(SQLObjects[i].sql)) {
        return false;
      }
      i++;
    } while (i < SQLObjects.length);
    return true;
  };
  function sqlProcessor(transaction, sqlObjects, finalSuccess, failure) {
    var sequenceNumber = 0,
    dataForNextTransaction = null,
    runTransaction = function () {
      transaction.executeSql(sqlObjects[sequenceNumber].sql,
       sqlObjects[sequenceNumber].data,
       successCallback,
       failureCallback);
    },
    successCallback = function (transaction, results) {
      var i, max, rowsArray = [];
      if(html5sql.logInfo){
        console.log("Success processing: " + sqlObjects[sequenceNumber].sql);
      }
      if(html5sql.putSelectResultsInArray && isSelectStmt(sqlObjects[sequenceNumber].sql)){
        for(i = 0, max = results.rows.length; i < max; i++){
          rowsArray[i] = results.rows.item(i);
        }
      } else {
        rowsArray = null;
      }
      dataForNextTransaction = sqlObjects[sequenceNumber].success(transaction, results, rowsArray);
      sequenceNumber++;
      if (dataForNextTransaction && $.isArray(dataForNextTransaction)) {
        sqlObjects[sequenceNumber].data = dataForNextTransaction;
        dataForNextTransaction = null;
      } else {
        dataForNextTransaction = null;
      }
      if (sqlObjects.length > sequenceNumber) {
        runTransaction();
      } else {
        finalSuccess(transaction, results, rowsArray);
      }
    },
    failureCallback = function (transaction, error) {
      if(html5sql.logErrors){
        console.error("Error: " + error.message +
          " while processing statment " + (sequenceNumber + 1)+": " + sqlObjects[sequenceNumber].sql);
      }
      failure(error, sqlObjects[sequenceNumber].sql);
    };

    runTransaction();
  };
  var SQLObject = function(options){
    if (typeof options === "string") {
      options = {
        sql: options
      }
    }
    this.sql = options.sql;
    this.data = options.data || emptyArray;
    this.success = options.success || doNothing;
    if (typeof this.sql     !== "string"   ||
      typeof this.success !== "function" ||
      !$.isArray(this.data)) {
      throw new Error("Malformed sql object: " + this);
  }
};
function sqlObjectCreator(sqlInput) {
  var i;
  if (typeof sqlInput === "string") {
    sqlInput = trim(sqlInput);
    sqlInput = sqlInput.split(';');
    for(i = 1; i < sqlInput.length; i++){
      while(sqlInput[i].split(/["]/gm).length % 2 === 0 ||
        sqlInput[i].split(/[']/gm).length % 2 === 0 ||
        sqlInput[i].split(/[`]/gm).length % 2 === 0){
        sqlInput.splice(i,2,sqlInput[i] + ";" + sqlInput[i+1]);
    }
    sqlInput[i] = trim(sqlInput[i]) + ';';
    if(sqlInput[i] === ';'){
      sqlInput.splice(i, 1);
    }
  }
}
if(isArray(sqlInput) === false){
  sqlInput = [new SQLObject(sqlInput)];
}
for (i = 0; i < sqlInput.length; i++) {
  sqlInput[i] = new SQLObject(sqlInput[i]);
}
return sqlInput;
};

html5sql.openDatabase =  function (name, displayname, size, whenOpen) {
  html5sql.database = openDb(name, dbVersion, displayname, size);
  readTransactionAvailable = typeof html5sql.database.readTransaction === 'function';
  if (whenOpen) {
    whenOpen();
  }
}
html5sql.process = function (sqlInput, finalSuccessCallback, failureCallback) {
  if (html5sql.database) {

    var sqlObjects = sqlObjectCreator(sqlInput);

    if(isUndefined(finalSuccessCallback)){
      finalSuccessCallback = doNothing;
    }

    if(isUndefined(failureCallback)){
      failureCallback = html5sql.defaultFailureCallback;
    }

    if (allStatementsAreSelectOnly(sqlObjects) && readTransactionAvailable) {
      html5sql.database.readTransaction(function (transaction) {
        sqlProcessor(transaction, sqlObjects, finalSuccessCallback, failureCallback);
      }, failureCallback);
    } else {
      html5sql.database.transaction(function (transaction) {
        sqlProcessor(transaction, sqlObjects, finalSuccessCallback, failureCallback);
      }, failureCallback);
    }
  } else {
    if(html5sql.logErrors){
      console.error("Error: Database needs to be opened before sql can be processed.");
    }
    return false;
  }
};
html5sql.changeVersion = function (oldVersion, newVersion, sqlInput, finalSuccessCallback, failureCallback) {
  if (html5sql.database) {
    if(html5sql.database.version === oldVersion){
      var sqlObjects = sqlObjectCreator(sqlInput);

      if(isUndefined(finalSuccessCallback)){
        finalSuccessCallback = doNothing;
      }

      if(isUndefined(failureCallback)){
        failureCallback = html5sql.defaultFailureCallback;
      }

      html5sql.database.changeVersion(oldVersion, newVersion, function (transaction) {
        sqlProcessor(transaction, sqlObjects, finalSuccessCallback, failureCallback);
      }, failureCallback);
    }
  } else {
    if(html5sql.logErrors){
      console.log("Error: Database needs to be opened before sql can be processed.");
    }
    return false;
  }
};

return html5sql;
})();

function errorDB(err) {
  log("Error processing SQL -> Code :"+err.code +" -> Message : "+err.message);
}

function successDB() {
}

function execute(sql,funcion){

  // alert(db);
  // alert(sql);
  if(db==null){
    // alert(sql);
    // alert(dbName);
    // alert(dbVersion);
    // alert(dbDescription);
    // alert(dbSize);
   db = openDb(dbName, dbVersion, dbDescription, dbSize);
   execute(sql,funcion);
   return;
 }
 if(sql.toLowerCase().indexOf('create')!=-1|sql.toLowerCase().indexOf('drop')!=-1){
  db.transaction(function(tran){
    tran.executeSql(sql);
  }, function(err){
    log(`error : ${sql}`);
    funcion(0);
  }, function(){funcion(1);});
}else if(sql.toLowerCase().indexOf('delete')!=-1|sql.toLowerCase().indexOf('update')!=-1){
  db.transaction(function(tran){
    tran.executeSql(sql, [], function(tra,res){
      funcion(res.rowsAffected);
    }, function(err){
      log(`error : ${sql}`);
      funcion(0);
    });
  }, errorDB, successDB);
}else if(sql.toLowerCase().indexOf('insert')!=-1){
  db.transaction(function(tran){
    tran.executeSql(sql, [], function(tra,res){ funcion(res.rowsAffected,res.insertId); 
    }, function(err){log(`error : ${sql}`);funcion(0);});
  }, errorDB, successDB);
}else{
 db.transaction(function(tran){tran.executeSql(sql, [], function(tra,res){
  if(res.rows.length>0){
    let data=[];
    for(var i=0;i<res.rows.length;i++){
      data.push(res.rows.item(i));
    }
    funcion(data);
  }else{
    funcion([]);
  }
}, function(err){log(JSON.stringify(err));funcion(0);});}, function(err){log(JSON.stringify(err));}, successDB);  
}
}
function bigQuery(sql,onFinish){
  try {
    html5sql.openDatabase(dbName, dbDescription, dbSize);
    var startTime = new Date();
    html5sql.process(
      sql,
      function(){var endTime = new Date(); log("Succes bigQuery in: " +((endTime - startTime) / 1000) + "s"); onFinish(1);},
      function(error, failingQuery){
        log("query Error: " + error.message);
        onFinish(0);
      });
  } catch (error) {
    log("query Error: " + error.message);
  }
}
function createFile(name,data,onSuccess_1){
  if(!isApp){
    return;
  }
  checkFile(name,function(res){
    if(res==0){
      newFile(name,function(file){
        if(file!=0){
          writeFile(file,data,onSuccess_1);
        }
      });
    }else{
      writeFile(res,data,onSuccess_1,true);
    }
  });
}
function checkFile(name,onCheck){
  if(!isApp){
    return;
  }
  window.requestFileSystem(window.PERSISTENT,0, function (fs) {
    fs.root.getFile(name, { create: false, exclusive: false },onCheck, function(err){onCheck(0);});
  },null);
}
function newFile(name,onCreate){
  if(!isApp){
    return;
  }
  window.requestFileSystem(window.PERSISTENT,0, function (fs) {
    fs.root.getFile(name, { create: true, exclusive: false },onCreate, function(err){onCreate(0);});
  },null);
}
function readFile(fileEntry,onLoad_Result) {
  if(!isApp){
    return;
  }
  fileEntry.file(function (file) {
    var reader = new FileReader();
    reader.onloadend = function() {
      onLoad_Result(this.result);
    };
    reader.readAsText(file);
  }, function(err){onLoad_Result(0);});
}
function writeFile(fileEntry,data,onSuccess_1,over){
  if(!isApp){
    return;
  }
  fileEntry.createWriter(function (fileWriter) {
    fileWriter.onwriteend = function(){onSuccess_1(1)};
    fileWriter.onerror = function(err){onSuccess_1(0);};
    if(over){
      try {
        fileWriter.seek(fileWriter.length);
      }catch (e) {
        log("file doesn't exist!");
      }
    }
    fileWriter.write(data);
  });
}
function requestFile(path,type,funcion){
  var xhr = new XMLHttpRequest();
  xhr.open('GET',path, true);
  xhr.responseType = type;
  xhr.onload = function() {
    if (this.status == 200) {
      if (typeof(funcion) === "function") {funcion(this.response)};
    }
  };
  xhr.send();
}
function loadSchema(){
  execute('select * from extra',function(data){
   if(data==0){
    requestFile('schema.sql','text',function(data){
      bigQuery(data,function(res){
        if(res==1){
          log('Succes db Loaded');
        }else{
          log('Error on db load');
        }
      });
    });
    log('schema was loaded succes');
  }
});
}

if(isApp){
  document.addEventListener('deviceready', function(){
    loadSchema();
  }, false);
}else{
  loadSchema();
}