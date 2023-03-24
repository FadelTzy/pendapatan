@extends('pdf.layouts3')
@section('css')
    <style>
        * {
            font-size: 12px;
            font-family: sans-serif;
            box-sizing: border-box;

        }
    </style>
@endsection
@section('content')
<table style="margin:0px 0px">
    <tr>
        <td colspan="2" style="text-align: center"><h3>REFERENSI AKUN</h3></td>
    </tr>
</table> 
<table id="customers">
    <tr>

        <td colspan="2"></td>
    </tr>     @foreach ($datax as $item)
    <tr>
        <td style="font-weight:bold">{{$item->kode_akun}}</td>
        <td>{{$item->nama_akun}}</td>

    </tr> 
    @foreach ($item->mDetail as $i)
    <tr>
        <td></td>
        <td>{{$i->mD->detail}}</td>
    </tr> 
    @endforeach
    <tr>
        <td colspan="2"></td>
    </tr> 
    @endforeach

</table>



@endsection