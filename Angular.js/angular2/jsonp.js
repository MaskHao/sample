/**
 * Created by lanou on 16/8/19.
 */
var express = require("express");
var app = express();
app.get("/jsonp", function (req,res) {
    console.log(req.query);
    var query = req.query;
    var cb = query.cb;
    var wd = query.wd;
    var json = {
        wd:wd
    };
    res.send(cb+"("+JSON.stringify(json)+")");
});
app.get("*", function (req,res) {

    var path = __dirname+"/"+req.url;
    console.log(path);
    res.sendFile(path);
})
app.listen(8088);
