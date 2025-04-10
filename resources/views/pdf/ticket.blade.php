<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket PDF</title>
    <style>
        @page {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .ticket-container {
            width: 100%;
            height: 400px;
            border: 2px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            page-break-inside: avoid;
        }
        .ticket-content {
            width: 100%;
            height: 100%;
            display: table;
            table-layout: fixed;
        }
        .left {
            display: table-cell;
            width: 50%;
            position: relative;
            vertical-align: top;
            background-color: #000;
        }
        .left-content {
            position: relative;
            width: 100%;
            height: 400px;
        }
        .event-image {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
        .event-name {
            position: absolute;
            top: 20px;
            left: 20px;
            color: white;
            font-size: 24px;
            font-weight: bold;
            z-index: 2;
        }
        .event-place {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: white;
            font-size: 18px;
            font-weight: 500;
            z-index: 2;
        }
        .right {
            display: table-cell;
            width: 50%;
            background-color: #7A38FC;
            color: white;
            vertical-align: top;
        }
        .right-content {
            padding: 30px;
            height: 340px;
            position: relative;
        }
        .details-top {
            width: 100%;
            margin-bottom: 30px;
            height: 30px;
        }
        .date {
            float: left;
            font-size: 20px;
        }
        .logo {
            float: right;
            font-weight: bold;
            font-size: 22px;
        }
        .artist {
            font-size: 18px;
            margin-bottom: 30px;
            padding-top: 10px;
        }
        .artist:before {
            content: "♪";
            margin-right: 10px;
            font-size: 22px;
        }
        .price {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .notice {
            background-color: rgba(255,255,255,0.15);
            padding: 15px;
            text-align: center;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            position: absolute;
            bottom: 30px;
            left: 30px;
            right: 30px;
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <div class="ticket-content">
            <div class="left">
                <div class="left-content">
                    <img class="event-image" src="{{ public_path($eventPurchase->event->image) }}" alt="Event Image">
                    <div class="event-name">{{ $eventPurchase->event->nom }}</div>
                    <div class="event-place">{{ $eventPurchase->event->place }}</div>
                </div>
            </div>
            <div class="right">
                <div class="right-content">
                    <div class="details-top">
                        <span class="date">{{ \Carbon\Carbon::parse($eventPurchase->event->date)->format('d M') }}</span>
                        <span class="logo">Beatwave</span>
                    </div>
                    <div class="artist">
                        {{ $eventPurchase->event->artist->Firstname }} {{ $eventPurchase->event->artist->LastName }}
                    </div>
                    <div class="price">
                        {{ $eventPurchase->event->taketPrice }} $
                    </div>
                    <div class="notice">
                        Present this ticket at entry
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>