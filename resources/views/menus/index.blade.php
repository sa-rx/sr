@extends('layouts.app')

@section('title', 'الاصناف ')

@section('content')

<div class="col-xl-12 mx-auto container  section-bg2 rounded table-responsive">
    <br>
    @can('اضافة صنف')<a  class=" btn btn-outline-light mx-auto mb-2" href="{{route('menu.create')}}"><i class="fas fa-plus-square"></i>  اضافة اصناف </a>  @endcan
    <table style="--bs-table-hover-color: #d8a781 ;     border-color: #1e252c00;" class="table section-bg rounded  table-hover  text-light ">
        <thead  class="">
            <tr> 

            <th scope="col">الصوره</th>
            <th scope="col">الاسم</th>
            <th scope="col " >السعر</th>
            
            <th scope="col"> سعره حراريه</th>
            <th scope="col"> الفئه</th>
            <th scope="col"> بواسطه</th>
            <th scope="col"> متوفر</th>
            <th scope="col">عرض</th>
            <th scope="col">حذف</th>
            </tr>
        </thead>

        <tbody>
            @forelse($menus as $menu)
                <tr>
                    <td ><img style="width: 54px;" src="{{$menu->img_url}}" class="menu-img" alt=""></td>

                    <td ><a class="text-light" href="{{route('menu.show',$menu)}}">{{$menu->name}}</a></td>

                   
                    <td>{{$menu->price}}</td>
                  

                    @if(isset($menu->calories))
                    <td>{{$menu->calories}}</td>
                    @else
                    <td>-</td>
                    @endif
                    
                    <td>{{$menu->category->name}}</td>

                    <td>{{$menu->user_id}}</td>
                    
                    @if($menu->available == 1)
                    <td class="ms-auto">متوفر</td> 
                    @else
                    <td class="ms-auto">غير متوفر</td> 
                    @endif
                    @can('تعديل صنف')
                    <td> <a class="btn btn-outline-primary" href="{{route('menu.edit',$menu)}}">  <i class="fas fa-pen-square"></i></a> </td>
                    @endcan
                    @can('حذف صنف')
                    <td>
                        <form method="post" action="{{route('menu.destroy',$menu)}}">
                            @method('delete')
                            @csrf
                            <button onclick="return confirm('هل انت متأكد؟')" class="btn btn-outline-danger" > <i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                    @endcan
                </tr>
            @empty
             <p>لا توجد حجوزات</p>
            @endforelse
        </tbody>
    </table>
    <br>
</div>

@endsection
