const Router = require("@koa/router");
const router = new Router();
const bodyParser = require("koa-bodyparser");
const {body} = require("koa/lib/response");
const Register = require("./app/Register");


router.post("/query", bodyParser(), async (ctx) => {
    if(ctx.request.body.token && ctx.request.body.token.length > 0 && ctx.request.body.title && ctx.request.body.title.length > 0
    && ctx.request.body.content && ctx.request.body.content.length > 0){
        const body = ctx.request.body;
        const Service = new Register(body.token, body.title, body.content);
        ctx.body =await Service.call();

    } else {
     return ctx.status = 403;
    }
    ctx.status = 200;
})

router.get("/", (ctx) => {
    ctx.body = "Hello World";
})

module.exports = router;