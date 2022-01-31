@extends('layouts.app')

@section('title', 'تواصل معنا')

@section('content')

<div class="container table-responsive section-bg2 rounded">
<br>
    <table  style="--bs-table-hover-color: #d8a781 ; border-color: #1e252c00;" class="table rounded section-bg table-hover  text-light">
        <thead  class="">
            <tr>
                <th scope="col">الاسم</th>
                <th scope="col">الايميل</th>
                <th scope="col"> الرساله</th>
                <th scope="col">حذف</th>
            </tr>
        </thead>
        
        <tbody>
            @forelse($contacts as $contact)
                <tr>
                @can('عرض الرسايل  في صفحة تواصل معنا')
                    <td><a class="" href="{{route('contacts.show',$contact)}}"> {{$contact->name}}</a></td>
                    @endcan      
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->content}}</td>
                    @can('حذف الرسايل في صفحة تواصل معنا')
                    <td>
                    
                        <form method="post" action="{{route('contacts.destroy',$contact)}}"href="">
                            @method('delete')
                            @csrf
                            <button onclick="return confirm('هل انت متأكد؟')" class="btn btn-outline-danger" > <i class="fas fa-trash-alt"></i></button>
                        </form>

                    </td>
                    @endcan   
                </tr>
            @empty
                <p>لا توجد رسايل</p>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
