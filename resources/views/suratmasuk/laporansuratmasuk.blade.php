<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UPT Pajak Daerah - @yield('title')</title>
    
      <style>
        body 
        {
            font-family: sans-serif;
            font-size: 15px;

        }
        table
        {
            width: 100%;
        }

        table, th, td
        {
            border : 1px solid black;
            border-collapse: collapse;
            opacity: 0.95;

        }

        th, td
        {
            padding: 10px;
            text-align: center;
        }


    </style>

</head>

<body>
        <img src="images/logo.png" alt="">
        <h3 align="center" class="grid-item">UPT PAJAK DAERAH KOTA BANJARBARU</h3>  
    
    <table align="center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Surat</th>
                                            <th>Unit Kerja</th>
                                            <th>Perihal</th>
                                            <th>Tanggal Surat</th>
                                            <th>Tanggal Diterima</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($suratmasuks as $suratmasuk)
                                        <tr>
                                            <td>{{ $suratmasuk->id }}</td>
                                            <td>{{ $suratmasuk->nomor_surat }}</td>
                                            <td>{{ $suratmasuk->unit_kerja }}</td>
                                            <td>{{ $suratmasuk->perihal }}</td>
                                            <td>{{ $suratmasuk->tanggal_surat }}</td>
                                            <td>{{ $suratmasuk->tanggal_diterima }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
    
</body>
</html>
