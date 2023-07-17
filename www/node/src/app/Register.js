class Register {
    constructor(token, title, content) {
        this.token = token;
        this.title = title;
        this.content = content;
    }

    async call() {
        const path = this.title.split("@");
        const service = this.capitalizeFirstLetter(path[0]);
        const action = path[1];
        console.log(service, action);

        // Динамическое подключение модуля
        const ServiceClass = require(`./services/${service}`);
        const serviceInstance = new ServiceClass();

        if (typeof serviceInstance[action] === "function") {
            await serviceInstance[action](this.token);
            return 200;
        } else {
            throw new Error(`Метод ${action} не найден в классе ${service}`);
        }
    }
    capitalizeFirstLetter(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }
}

module.exports = Register;

