@extends('thema')
@section('content')
<div id="content">
    <section id="tables">
        <div style="background-color: red;"><button onclick="ExportToExcel()">Alışverişleri listele</button> </div>
        <table id="export">
            <thead>
                <tr>
                    <th>Item</th> 
                    <th>Item</th>
                    <th>Item</th>
                    <th>Item</th>
                    <th>Item</th>
                    <th>Item</th>
                    <th>Item</th>
                    <th>Item</th>
                    <th>Item</th>
                    <th>Item</th>
                    <th>Item</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($query as $key => $item)

                    <tr>
                        {{-- <td class="current_row">{{ $item->customer_id }}</td> --}}


                        <td class="current_row">
                        @foreach ($products[$key] as $counter=> $prd)
                            
                                {{$prd->name}}
                            
                               @if ($counter!=count($products[$key])-1)
                                   ,
                               @endif
                                {{-- {{$prd->product_name."X".$prd->quanity}} --}}
                            
                        @endforeach

                    </td>


                    </tr>
                    {{-- <td class="current_row">{{ $item->total_amount }}</td>
                        <td>{{ $item->shopping_time }}</td> --}}


                @endforeach
            </tbody>
        </table>

    </section>
</div>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script>
    function ExportToExcel(type, fn, dl) {
        var elt = document.getElementById('export');
        var wb = XLSX.utils.table_to_book(elt, {
            sheet: "sheet1"
        });
        return dl ?
            XLSX.write(wb, {
                bookType: type,
                bookSST: true,
                type: 'base64'
            }) :
            XLSX.writeFile(wb, fn || ('MySheetName.' + (type || 'xlsx')));
    }
</script>
@endsection