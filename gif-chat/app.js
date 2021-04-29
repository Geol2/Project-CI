const express = require('express');
const app = express();

const webSocket = require('./socket');
const indexRouter = require('./routes');

app.listen(app.get('port'), () => {
  console.log(app.get('port'), '번 포트에서 대기 중');
});

webSocket(server);