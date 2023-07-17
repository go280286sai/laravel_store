<footer>
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <h4>Информация</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">Главная</a></li>
                        <li><a href="#">О магазине</a></li>
                        <li><a href="#">Оплата и доставка</a></li>
                        <li><a href="#">Контакты</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-6">
                    <h4>Время работы</h4>
                    <ul class="list-unstyled">
                        <li>г. Киев, ул. Пушкина, 10</li>
                        <li>пн-вс: 9:00 - 18:00</li>
                        <li>без перерыва</li>
                    </ul>
                </div>

                <div class="col-md-3 col-6">
                    <h4>Контакты</h4>
                    <ul class="list-unstyled">
                        <li><a href="tel:5551234567">555 123-45-67</a></li>
                        <li><a href="tel:5551234567">555 123-45-68</a></li>
                        <li><a href="tel:5551234567">555 123-45-69</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-6">
                    <h4>Мы в сети</h4>
                    <div class="footer-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
<div class="modal fade" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div id="cart">
                    </div>
                    <div>
                        <table class="table">
                            <tr class="table-dark">
                                <td>Всего количество товара:</td>
                                <td id="get_count"></td>
                            </tr>
                            <tr class="table-dark">
                                <td>На общую сумму</td>
                                <td id="get_sum"></td>
                        </table>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
                            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

                    <script>
                        $(document).ready(function () {
                            update_cart()
                        });

                        function update_cart() {
                            let total_price = 0;
                            let total_qty = 0;
                            $.ajax({
                                url: '/cart/get',
                                type: 'GET',
                                success: function (data) {
                                    const carts = data;
                                    let body = `<table class="table table-hover">
                          <tr class="table-dark">
                          <th>Название</th>
                          <th>Цена</th>
                          <th>Количество</th>
                          <th colspan="2">Сумма</th>
                          </tr>`;
                                    for (let cart in carts) {
                                        total_qty += carts[cart].qty;
                                        total_price += carts[cart].price * carts[cart].qty;
                                        body += ` <tr class="table-light">
                         <td>${carts[cart].title}</td>
                         <td>${carts[cart].price}</td>
                         <td>
                         <input type="number" style="width: 50px"  id="update_${carts[cart].id}" value="${carts[cart].qty}" />
                         <input type="button" value="Обновить" class="btn btn-success" onclick="update(${carts[cart].id})">
                         </td>
                         <td>${carts[cart].price * carts[cart].qty}</td>
                         <td>
                         <input type="button" value="Удалить" class="btn btn-danger" onclick="remove(${carts[cart].id})">
                         </td>
                         </tr>`
                                    }
                                    body += `</table>`;
                                    $('#cart').html(body);
                                    $('#get_sum').text(total_price + ' грн');
                                    $('#get_count').text(total_qty + ' шт.');
                                    $('#cart-count').text(total_qty);
                                },
                            })
                        }

                        function remove(id) {
                            $.ajax({
                                url: '/cart/remove',
                                type: 'GET',
                                data: {
                                    id: id
                                },
                                success: function () {
                                    update_cart()
                                },
                                error: function (data) {
                                    console.log(data);
                                }
                            })
                        }

                        function update(id) {
                            const qty = $(`#update_${id}`).val();
                            console.log(qty);
                            $.ajax({
                                url: '/cart/update',
                                type: 'GET',
                                data: {
                                    id: id,
                                    qty: qty
                                },
                                success: function () {
                                    update_cart()
                                },
                                error: function (data) {
                                    console.log(data);
                                }
                            })
                        }
                    </script>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger ripple" data-bs-dismiss="modal">Продолжить покупки</button>
                <button type="button" class="btn btn-primary">Оформить заказ</button>
            </div>
        </div>
    </div>
</div>
