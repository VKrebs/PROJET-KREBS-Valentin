const express = require('express');

const app = express();
app.use(express.static(__dirname + '/dist/TP'));

app.get('/*', function (req, res) {
    res.sendFile(__dirname + '/dist/TP/index.html');
});

app.listen(process.env.PORT || 8080);