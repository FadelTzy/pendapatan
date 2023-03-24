<!DOCTYPE html>
<html lang="en">

<head>




    <style>
        .bordered {
            border: 1px solid black;
            padding: 5px
        }

        html,
        body {
            box-sizing: border-box;
            margin-top: 5px;
            margin-right: 10px;
            margin-left: 10px;
        }

        * {

            font-size: 12px;
            font-family: 'Times New Roman', Times, serif;
            box-sizing: border-box;
            line-height: normal;

        }

        .tbtr td {
            line-height: 5px;
        }

        .tbtr2 td {
            line-height: 8px;
        }

        .column {
            margin: 0px;
            box-sizing: border-box;
            float: left;
            width: 55%;
            padding: 0px;
            /* Should be removed. Only for demonstration */
        }

        .column2 {
            margin: 0px;
            box-sizing: border-box;
            float: left;
            width: 45%;
            padding: 0px;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .tbfont {
            font-size: 8px;
        }

        .border-table {
            border: 0px solid black;
        }

        .center-table {
            margin-left: auto;
            margin-right: auto;
        }

        .judul {
            font-size: 12px
        }

        .tc {
            text-align: center;
            padding: 0;
        }

        html {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
        }

        td,
        th {

            padding: 3px;
        }


        tr.borderless td {
            border: 2px;
        }

        tr.bgrow {
            background-color: #dddddd;
        }

        .p {
            font-size: 10.5px;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #ce8d0c;
            color: white;
        }
    </style>
    <!-- icons -->
</head>
@include('pdf.css')
@yield('css')

<body>

    <div id="wrapper">

        @yield('content')

    </div>





    <!-- App js -->

</body>

</html>
