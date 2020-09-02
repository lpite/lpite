var mysql = require('mysql');
prod = {};
var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "root",
  database: "two"
});

con.connect(function (err) {
  if (err) throw err;
  con.query("SELECT * FROM tovar", function (err, result, fields) {
    if (err) throw err;
    prod = result;
    console.log(prod);
  });
});