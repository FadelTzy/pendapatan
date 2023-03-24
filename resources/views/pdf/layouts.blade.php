<!DOCTYPE html>
<html lang="en">

<head>




    <style>
        .bordered {
            border: 1px solid black;
        }

       html, body {
            box-sizing: border-box;
            margin-top: 0px;
            margin-right: 5px;
            margin-left:5px;
        }
    
        * {

            font-size: 11px;
            font-family: sans-serif;
            box-sizing: border-box;
            line-height: normal;
       
        }
        .tbtr td{
            line-height: 5px;
        }
        .tbtr2 td{
            line-height: 8px;
        }
        .column {
            margin: 0px;
            box-sizing: border-box;
            float: left;
            width: 60%;
            padding: 0px;
            /* Should be removed. Only for demonstration */
        }
        .column2 {
            margin: 0px;
            box-sizing: border-box;
            float: left;
            width: 40%;
            padding: 0px;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .tbfont{
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
            font-size: 17px
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
    </style>
    <!-- icons -->
</head>
@yield('css')
@include('pdf.css')

<body>

    <div id="wrapper">

        @yield('content')

    </div>





    <!-- App js -->

</body>

</html>
