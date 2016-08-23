/**
 * Created by lanou on 16/8/19.
 */
var express = require("express");
var app = express();
app.get("/login",function(req,res){
    console.log(req.query);
    var query = req.query;
    var name = query.name;
    var pass= query.password;
    var json = {
        name:name,
        pass:pass
    }
    res.send(json);
});
app.get("*", function (req,res) {
    var path = __dirname+req.path;
    console.log("/////"+path);

    res.sendFile(path);

})
app.listen(8091);