const express = require('express');
const app = express();

const http = require('http');

//const webSocket = require('./socket');
//const indexRouter = require('./routes');

//app.use('/', indexRouter);

app.get('/', function (req, res) {
  res.send('GET request to homepage')
});

http.createServer(app).listen(8080);

//webSocket(server);