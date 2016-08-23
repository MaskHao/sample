var express = require("express");
var app = express();
var mongoose = require("mongoose");
var db = mongoose.connect("mongodb://127.0.0.1:27017/wanghao");
db.connection.on("error",function(error){
    console.log("数据库连接失败:"+error);
});
db.connection.on("open",function(){
    console.log("数据库连接成功");
});


var UserSchema = new mongoose.Schema({
    firstname:{type:String},
    lastname:{type:String},
    pass:{type:Number}
},{
    collection:"user"
})
var Model = db.model("user",UserSchema);

app.get('/user', function (req,res) {
   var act = req.query.act;
    console.log("123"+ req.query);
    if(act == "list"){
        console.log("list");
        Model.find({}, function (err,doc) {
            res.send(doc);
        })
    }else if(act =="add"){
        console.log("!!!!!!!");
        console.log(req.query);
        console.log(req.query.first+"//"+req.query.last+"//"+req.query.pass);

        Model.create(req.query,function(err,doc){
            if (err){
                console.log(err);
            }else {
                console.log(doc);
            }
            res.send(doc);
        })
    }else if(act=="change"){
        console.log("change"+req.query);
        //Model.update()
    }
});
app.get("*", function (req,res) {
    console.log(req.pathname);
    var path = __dirname + "/"+req.url;
    res.sendFile(path);
})
app.listen(9092);