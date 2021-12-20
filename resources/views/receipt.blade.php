@extends('thema')
@section('content')
    <section class="container">
        @csrf
        <div class="receipt">
            <h1>Fiş Oluşturma</h1>
            <div class="create">
                <div>
                    <input id="query-input" type="text">
                    <button class="addButton"><i class="uil uil-plus"></i></button>
                </div>

                <div class="products">
                    <ul class="list">

                    </ul>
                </div>
            </div>
            <table></table>
        </div>
        <div class="tableBx">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ürün</th>
                        <th>İşlem</th>
                    </tr>
                </thead>
                <tbody class="receiptList">


                </tbody>
            </table>
            <button class="receiptAdd">Fiş Ekle</button>
        </div>

    </section>
    <script src="{{ asset('content/js/query.js') }}"></script>
@endsection
