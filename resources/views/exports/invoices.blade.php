<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        @foreach($invoices as $invoice)
        <thead >
        <tr>
            <th style="background-color: #5a5acf">{{__('Supplier')}}</th>
            <th style="background-color: #5a5acf">{{__('Quantity')}}</th>
            <th style="background-color: #5a5acf">{{__('Weeks')}}</th>
            <th style="background-color: #5a5acf">{{__('Average')}}</th>
            <th style="background-color: #5a5acf">{{__('Date')}}</th>
            <th style="background-color: #5a5acf">{{__('Selling Average')}}</th>
            <th style="background-color: #5a5acf">{{__('Total Average')}}</th>
        </tr>
        </thead>
        <tbody >
                <tr >
                    <td style="background-color: #8db8ff">{{App\Models\Supplier::find($invoice['supplier_id'])->name}}</td>
                    <td style="background-color: #8db8ff">{{$invoice['quantity']}}</td>
                    <td style="background-color: #8db8ff">{{$invoice['weeks']}}</td>
                    <td style="background-color: #8db8ff">{{$invoice['average']}}</td>
                    <td style="background-color: #8db8ff">{{$invoice['date']}}</td>
                    <td style="background-color: #8db8ff">{{$invoice['avgquantity']}}</td>
                    <td style="background-color: #8db8ff">{{$invoice['avgtotal']}}</td>
                </tr>
                <tr></tr>
                <tr>
                    <table>
                        <thead >
                        <tr >
                            {{-- @foreach($invoice['weeks_element'] as $element) --}}
                            @for ($i = 0; $i < count($invoice['weeks_element']); $i++)
                                 <th style="background-color: #539b53;width:400%" colspan>{{__('Week')}}{{$i+1}}</th>
                            @endfor
                               
                               
                            {{-- @endforeach --}}
                        </tr>
                        <tr >
                            @foreach($invoice['weeks_element'] as $element)
                                {{-- <th style="background-color: #97ff97">{{__('Week')}}</th> --}}
                                <th style="background-color: #97ff97">{{__('Quantity')}}</th>
                                <th style="background-color: #97ff97">{{__('Growth')}} %</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody >
                                <tr>
                        @foreach($invoice['weeks_element'] as $element)
                                                              
                                    <td style="background-color: #a3ffd6">{{$element->name}}</td>
                                    <td style="background-color: #a3ffd6">{{$element->quantity}}</td>
                                    <td style="background-color: #a3ffd6">{{$element->average}}</td>
                                    
                        @endforeach
                                </tr>
                        </tbody>
                    </table>
                </tr>
             
        </tbody>
        @endforeach
    </table>
</body>
</html>
