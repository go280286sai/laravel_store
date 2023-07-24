<footer>
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <h4>{{__('messages.information')}}</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">{{__('messages.main')}}</a></li>
                        <li><a href="#">{{__('messages.about')}}</a></li>
                        <li><a href="#">{{__('messages.delivery')}}</a></li>
                        <li><a href="#">{{__('messages.contacts')}}</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-6">
                    <h4>{{__('messages.work_time')}}</h4>
                    <ul class="list-unstyled">
                        <li>{{__('messages.address')}}</li>
                        <li>{{__('messages.graph')}}</li>
                        <li>{{__('messages.reset_time')}}</li>
                    </ul>
                </div>

                <div class="col-md-3 col-6">
                    <h4>Контакты</h4>
                    <ul class="list-unstyled">
                        <li><a href="tel:{{env('APP_PHONE')}}">{{env('APP_PHONE')}}</a></li>
                        <li><a href="tel:{{env('APP_PHONE')}}">{{env('APP_PHONE')}}</a></li>
                        <li><a href="tel:{{env('APP_PHONE')}}">{{env('APP_PHONE')}}</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-6">
                    <h4>{{__('messages.social')}}</h4>
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
                <h5 class="modal-title" id="exampleModalLabel">{{__('messages.cart')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(count(\Illuminate\Support\Facades\Session::get('cart')??[])>0)
                    <div id="cart">
                    </div>
                    <div>
                        <table class="table">
                            <tr class="table-dark">
                                <td>{{__('messages.all_products')}}</td>
                                <td id="get_count"></td>
                            </tr>
                            <tr class="table-dark">
                                <td>{{__('messages.total')}}</td>
                                <td id="get_sum"></td>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success ripple" data-bs-dismiss="modal" onclick="window.location.reload();">{{__('messages.continue')}}</button>
                        <button type="button" class="btn btn-primary">{{__('messages.order')}}</button>
                        <a href="/cart/clearCart"><div class="btn btn-danger">{{__('messages.clean_cart')}}</div></a>
                    </div>
                @else
                    <p>{{__('messages.empty_cart')}}</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success ripple" data-bs-dismiss="modal" onclick="window.location.reload();">{{__('messages.continue')}}</button>
                    </div>
                @endif



            </div>
        </div>
    </div>
</div>
