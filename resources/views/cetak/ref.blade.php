<table>
    <tr>
        <td colspan="2" style="text-align: center">Referensi Akun</td>
    </tr> 
    <tr>

        <td colspan="2"></td>
    </tr>     @foreach ($data as $item)
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
