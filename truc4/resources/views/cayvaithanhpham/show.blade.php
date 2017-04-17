@extends('layouts.master')

@section('title', 'Thông tin cây vải thành phẩm')

@section('content')
    <form action='/cayvaithanhpham/{{ $cayvaithanhpham->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Id:</label>
            <input style='cursor:not-allowed' disabled required name='id' value='{{ $cayvaithanhpham->id }}' />
        </p>

        <p>
            <label>Cây vải mộc:</label>
            <a href='/cayvaimoc/{{ $cayvaithanhpham->cay_vai_moc_id }}'>
                {{ $cayvaithanhpham->cay_vai_moc->id }}
                - xm{{ $cayvaithanhpham->cay_vai_moc->phieu_xuat_moc_id }}
                - ln{{ $cayvaithanhpham->cay_vai_moc->lo_nhuom_id }}
            </a>
        </p>

        <p>
            <label>Kích cỡ:</label>
            <input style='cursor:not-allowed' disabled type='number' step='0.01' name='kich_co' value='{{ $cayvaithanhpham->kich_co }}' />
        </p>

        <p>
            <label>Số mét:</label>
            <input style='cursor:not-allowed' disabled required type='number' name='so_met' value='{{ $cayvaithanhpham->so_met }}' />
        </p>

        <p>
            <label>Đơn giá:</label>
            <input style='cursor:not-allowed' disabled required type='number' name='don_gia' value='{{ $cayvaithanhpham->don_gia }}' />
        </p>

        <p>
            <label>Kho:</label>
            <a href='/kho/{{ $cayvaithanhpham->kho_id }}'>{{ $cayvaithanhpham->kho_id }}
                @if ($cayvaithanhpham->kho)
                    - {{ $cayvaithanhpham->kho->ten }}
                @endif
            </a>
        </p>

        <p>
            <label>Ngày giờ nhập kho:</label>
            <input style='cursor:not-allowed' disabled required type='datetime-local' step="1" name='ngay_gio_nhap_kho' value='{{ str_replace(" ","T",$cayvaithanhpham->ngay_gio_nhap_kho) }}' />
        </p>

        <p>
            <label>Hóa đơn xuất:</label>
            <a href='/hoadonxuat/{{ $cayvaithanhpham->hoa_don_xuat_id }}'>{{ $cayvaithanhpham->hoa_don_xuat_id }}</a>
        </p>

        <p><a href='/cayvaithanhpham/{{ $cayvaithanhpham->id }}/edit' class='btn btn-success'>Chỉnh sửa</a></p>
    </form>


    @if ($cayvaithanhpham->trashed())
        <p><a href='/cayvaithanhpham/{{ $cayvaithanhpham->id }}/restore' class='btn btn-warning'>Khôi phục<a/></p>
    @else
        <form action='/cayvaithanhpham/{{ $cayvaithanhpham->id }}' method='post'>
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p><input type='submit' class='btn btn-danger' value='Xóa' /></p>
        </form>
    @endif
@endsection
