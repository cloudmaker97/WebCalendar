<?php
use App\Calendar;
require "vendor/autoload.php";
$calendar = new Calendar();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kalender</title>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon-16x16.png">
    <link rel="manifest" href="assets/site.webmanifest">
</head>
<body>
    <?= $calendar->getComposedCalendar(); ?>

    <style>
        :root {
            --TableFont: white;
            --TableHeader: #cdffff;
            --TableBorder: white;
            --TableBackground: #161616;
            --TableSecondaryBorder: #3a3a3a;
            --TableCalendarWeek: #ff59bd;
            --CurrentDayBackground: #815858;
            --CurrentDayColor: red;
        }

        * {
            font-size: 1.5em;
        }

        body {
            user-select: none;
            padding: 1rem;
            font-family: Calibri, serif;
            background-color: #1e1e1e;
            color: var(--TableFont);
        }

        table {
            background-color: var(--TableBackground);
            border: 1px solid var(--TableBorder);
        }

        tr.headerOfDays {
            color: var(--TableHeader);
            font-size: .8rem;
        }

        tr > td {
            text-align: center;
            border: 1px solid var(--TableSecondaryBorder);
            font-size: 1rem;
        }

        td {
            padding: .3em;
        }

        td.calendarWeekEntry {
            color: var(--TableCalendarWeek);
        }

        td.calendarWeekEntry:hover {
            cursor: pointer;
            background-color: var(--TableBorder);
        }

        td.calendarDay:hover {
            cursor: pointer;
            background-color: var(--TableBorder);
            color: var(--TableBackground);
        }

        td.currentDay {
            background-color: var(--CurrentDayBackground);
        }

        td.currentDay {
            background-color: var(--CurrentDayBackground);
        }

        td.currentDay:hover {
            background-color: var(--TableBorder);
            color: var(--CurrentDayColor);
        }
    </style>
    <script>
        document.querySelectorAll("td.calendarWeekEntry, td.calendarDay").forEach(calendarEntry => {
            let CopyClipboardText = "";
            calendarEntry.addEventListener("click", (e) => {
                if(calendarEntry.classList.contains("calendarWeekEntry")) {
                    CopyClipboardText = `KW${e.target.textContent}`;
                } else if(calendarEntry.classList.contains("calendarDay")) {
                    CopyClipboardText = `${e.target.textContent}`;
                }
                navigator.clipboard.writeText(CopyClipboardText);
            });
        })
    </script>
</body>
</html>