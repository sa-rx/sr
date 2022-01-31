@extends('layouts.app')

@section('title', 'الفئات')

@section('content') 
<section id="menu" class="menu container section-bg3  rounded">

    <div class="container" data-aos="fade-up">
      <div class="row">
        @if($cart)
                
            <div class="col-12 ">
                        <h3 class="card-titel">
                            طلباتك
                            
                        </h3>
                       
                        @foreach($cart->items as $menu)
                            <div class="card  mb-2">
                                <div class="card-body section-bg3">
                                    <h5 class="card-title">
                                        {{$menu['name']}}
                                    </h5>
                                    <div class="card-text">
                                        {{$menu['price']}} ريال
        
                                        <form action="{{ route('cart.update',$menu['id'])}}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="number" name="qty" id="qty" value={{ $menu['qty']}}>
                                            <button type="submit" class="btn btn-info btn-sm">تعديل الطلب</button>
                                        </form>

                                        <form action="{{route('cart.remove',$menu['id'])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button tybe="submit" class="btn btn-danger btn-sm ml-4">حذف الطلب</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <p><strong>الاجمالي : ${{$cart->totalPrice}}</strong></p>

            

            
                <div class="card section-bg2 text-white">
                    <div class="card-body">
                       
                        <div class="card-text">
                            <p>
                            الاجمالي ${{$cart->totalPrice}}
                            </p>
                            <p>
                            عدد الاصناف {{$cart->totalQty}}
                            </p>

                                                            
                             

                           
                            <form action="{{ route('orders.store')}}" method="post">
                                @csrf
                                
                                <input type="hidden" name="cart" id="cart"     value="
                                  @foreach($cart->items as $menu)
                                 {{ $menu['qty']}} {{$menu['name']}} {{ $menu['price']}}
                                       @endforeach">
                                <input type="hidden" name="total_price" id="total_price" value="{{$cart->totalPrice}}">
                                <input type="hidden" name="total_qty" id="total_qty" value="{{$cart->totalQty}}">
                               

                                <button tybe="submit"  class="btn btn-info"> اتمام الطلب</button>
                                
                                </form>








                          <!--  <a  target="_blank"  href="-->
                          <!--  https://wa.me//966{{$about->number}}?text=الطلبات :-->
                           <!-- %20 -->
                           <!-- @foreach($cart->items as $menu)-->
                           <!-- {{$menu['qty']}}  |  {{$menu['name']}}-->
                           <!-- %20 -->
                           <!-- {{$menu['price']}} ريال  -->
                          <!--  ________________________-->
                           <!-- @endforeach-->
                          <!--  %20 -->
                            <!--*الاجمالي : {{$cart->totalPrice}}  ريال*-->
                           <!-- %20 -->
                           <!-- *عدد الاصناف {{$cart->totalQty}}*-->
                           <!-- %20 -->
                            <!--" class="btn btn-info">اتمام الطلب</a>-->
                        </div>
                    </div>
                </div>
            </div>
            
        @else 
            <p>لا توجد لديك اي طلبات</p>   
        @endif    
      </div>
    </div>

    </section><!-- End Menu Section -->

@endsection

