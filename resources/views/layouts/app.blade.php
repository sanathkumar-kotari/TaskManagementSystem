<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Task Management App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Your custom CSS styles */
        .input-container {
            position: relative;
        }

        .input-container .form-control {
            padding-right: 2.5rem; /* Adjust padding for the icon */
        }

        .input-container .icon {
            position: absolute;
            top: 50%;
            right: 0.75rem; /* Adjust position */
            transform: translateY(-50%);
            font-size: 1.2rem;
            color: #6c757d;
        }

        .card-body {
            width: 400px; /* Adjust as needed */
        }

        .custom-column-width {
            width: 80px; /* Adjust as needed */
        }

        .dashboard-heading {
            font-family: 'Georgia', serif;
            font-weight: bold;
            color: #cd222b;
            text-align: center;
            margin-top: 50px;
            margin-bottom: 20px;
            margin-right: 100px;
        }

        .heading {
            color: white;
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-top: 2rem;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }

        .custom-thead-dark {
            background-color: #32368d;
            color: #ffffff;
            font-family: 'Arial', sans-serif;
            font-weight: bold;
        }

        table.table-bordered th, table.table-bordered td {
            border: 1px solid #ddd;
        }

        .text-success {
            color: #28a745; /* Green for completed status */
        }

        .text-danger {
            color: #dc3545; /* Red for pending status */
        }

        .btn-pay {
            background-color: #5f20a0;
            border-color: #5f20a0;
            border-radius: 30px;
            padding: 10px 20px;
            color: #fff;
            font-size: 16px;
            text-align: center;
            display: inline-block;
            text-decoration: none;
        }

        .card {
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .card-body {
            flex: 1;
            width: 100%; 
            padding: 1rem;

        }

        .table-responsive {
    width: 100%; /* Adjust the table width to 100% to match the container */
    overflow-x: auto; /* Allow horizontal scrolling for smaller screens */
}


@media (max-width: 768px) {
    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    .card {
        width: 100%; /* Maintain full-width for small screens */
    }
}


        label {
            display: none;
        }

        .custom-excel-button {
            color: white;
            border: none;  
        }

        .custom-excel-button:hover {
            color: white;
        }

        .page-link {
            color: #ffffff;
            background-color: #32368d;
            border-color: #32368d;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: transparent !important;
            color: white;
            border: none;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:active {
            border: none;
            background: linear-gradient(to bottom, transparent 0%, transparent 100%);
            box-shadow: none;
        }

        .page-item.active .page-link {
            color: #32368d;
            background-color: #fff;
            border-color: #32368d;
        }

        .heading-image {
            height: 2em;
            width: 2em;
            border-radius: 50%;
            vertical-align: middle;
            background-color: #262c35;
        }

        .btn-primary {
            background-color: #32368d;
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background-color: #32368d;
            border: none;
            color: white;
        }

        .table-responsive {
            width: 630px;
            overflow-x: auto;
        }

        @media (max-width: 768px) {
            .table-responsive {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .table th,
            .table td {
                white-space: nowrap;
            }
        }

        .card-header h4 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .container {
            margin-top: 30px;
        }

        .modal-content {
            border-radius: 12px;
        }

        .form-control-lg {
            font-size: 1.1rem;
            padding: 10px;
            border-radius: 8px;
        }

        .btn {
            padding: 10px 15px;
        }

        .table thead th {
            text-align: center;
        }

        .table tbody td {
            vertical-align: middle;
        }

        .badge-warning {
            background-color: #ffc107;
        }

        .badge-success {
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @yield('scripts')
</body>
</html>
