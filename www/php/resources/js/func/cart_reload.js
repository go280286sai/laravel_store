function cart_reload(){
    axios.get('/cart_reload')
        .then((data)=>{
            const cart_reload = document.getElementById('cart-count');
            cart_reload.innerText = data;
        })
}
