<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Monthly Attendance Sheet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 1200px;
            margin: auto;
        }

        h2 {
            text-align: center;
        }

        .table-responsive {
            overflow-x: auto;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: fit-content;
        }

        th, td {
            border: 1px solid #ccc;
            text-align: center;
            padding: 5px 3px;
            font-size: 11px;
            white-space: nowrap;
        }

        th {
            background-color: yellow;
            font-weight: bold;
        }

        .header-inputs {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 10px;
            gap: 10px;
        }

        .header-inputs input, .header-inputs select {
            padding: 5px;
            font-size: 14px;
        }

        button {
            padding: 10px 18px;
            font-size: 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            background: #007bff;
            color: white;
            transition: background-color 0.3s ease;
            box-shadow: 0 3px 6px rgba(0,123,255,0.4);
            user-select: none;
        }

        button:hover {
            background: #0056b3;
            box-shadow: 0 4px 8px rgba(0,86,179,0.6);
        }

        button:active {
            background: #003d80;
            box-shadow: 0 2px 4px rgba(0,61,128,0.8);
        }

        .small-btn {
            padding: 6px 12px;
            font-size: 13px;
        }

        #message {
            margin-top: 10px;
            font-size: 14px;
            color: green;
        }

        td.holiday-column {
             /* No background color for the column itself */
        }

        .holiday-label {
            font-size: 9px;
            margin-top: 2px;
            display: block;
        }

        .holiday-label span {
            display: none;
        }

        th.holiday-column .holiday-label span {
            display: inline;
        }

        /* Default checkbox styling (for blue tick appearance) */
        input[type="checkbox"] {
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 14px;
            height: 14px;
            vertical-align: middle;
            cursor: pointer;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            outline: none;
            position: relative;
            background-color: #fff;

            /* **अतिरिक्त लाइनें जो साइज को स्थिर रखेंगी** */
            transition: all 0s !important; /* सभी ट्रांज़िशन तुरंत खत्म करें */
            transform: scale(1) !important; /* सुनिश्चित करें कि स्केल हमेशा 1 रहे */
            box-shadow: none !important; /* कोई भी बॉक्स शैडो हटा दें */
        }

        /* सुनिश्चित करें कि फोकस/एक्टिव पर भी कोई बदलाव न हो */
        input[type="checkbox"]:focus,
        input[type="checkbox"]:active {
            outline: none !important; /* आउटलाइन पूरी तरह से हटा दें */
            transform: scale(1) !important; /* स्केल हमेशा 1 रहे */
            box-shadow: none !important; /* कोई भी बॉक्स शैडो हटा दें */
            /* iOS पर टैप हाईलाइट हटाने के लिए (यदि आवश्यक हो) */
            -webkit-tap-highlight-color: transparent !important;
        }


        input[type="checkbox"]:checked {
            background-color: #007bff;
            border-color: #007bff;
        }

        input[type="checkbox"]:checked::before {
            content: '';
            display: block;
            width: 4px;
            height: 8px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
            position: absolute;
            top: 1px;
            left: 4px;
        }

        /* Style for disabled checkboxes in holiday columns (orange tick) */
        td.holiday-column input[type="checkbox"][disabled] {
            background-color: #ffe0b2;
            border-color: orange;
            cursor: not-allowed;
        }

        td.holiday-column input[type="checkbox"][disabled]::before {
            content: '';
            display: block;
            width: 4px;
            height: 8px;
            border: solid orange;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
            position: absolute;
            top: 1px;
            left: 4px;
        }

        @media print {
            body * {
                visibility: hidden;
            }
            #printable, #printable * {
                visibility: visible;
            }
            #printable {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            #printable table, #printable th, #printable td {
                font-size: 8px;
            }
            #printable .holiday-label {
                font-size: 6px;
                display: block !important;
            }
            #printable .holiday-label span {
                display: inline !important;
            }
            #printable input[type="checkbox"] {
                width: 10px;
                height: 10px;
            }
            #printable input[type="checkbox"]:checked::before,
            #printable td.holiday-column input[type="checkbox"][disabled]::before {
                width: 3px;
                height: 6px;
                top: 1px;
                left: 3px;
            }
        }

        @media screen and (max-width: 600px) {
            .header-inputs {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>📋PHP SUBJECT</h2>
    <h2>📋 BCA (2023-26) Attendance sheet</h2>
    <div class="header-inputs">
        <div>
            <label>Year:</label>
            <select id="sheetYear" onchange="loadMonth()"></select>
        </div>
        <div>
            <label>Month:</label>
            <select id="sheetMonth" onchange="loadMonth()">
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>
        </div>
        <div>
            <input type="text" id="newStudent" placeholder="Add new student" />
            <button onclick="addStudent()">Add Student</button>
        </div>

        <div>
            <label>From:</label>
            <input type="date" id="fromDate" />
        </div>
        <div>
            <label>To:</label>
            <input type="date" id="toDate" />
        </div>
        <div>
            <button onclick="calculateAttendancePercentage()">Attendance %</button>
        </div>
    </div>

    <button onclick="saveAttendance()">Save</button>
    <button onclick="printSheet()">Print</button>
    <div id="message"></div>

    <div class="table-responsive">
        <div id="printable">
            <table id="attendanceTable">
                <thead>
                    <tr>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody id="studentRows"></tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const daysInMonth = {
        January: 31,
        February: 28,
        March: 31,
        April: 30,
        May: 31,
        June: 30,
        July: 31,
        August: 31,
        
        September: 30,
        October: 31,
        November: 30,
        December: 31,
    };

    let students = JSON.parse(localStorage.getItem("students")) || ["Mahesh", "Rohit"];
    let attendance = JSON.parse(localStorage.getItem("monthlyAttendance")) || {};
    let holidays = JSON.parse(localStorage.getItem("holidays")) || {};

    function getMonthKey() {
        const year = document.getElementById("sheetYear").value;
        const month = document.getElementById("sheetMonth").value;
        return `${month}_${year}`;
    }

    function populateYears() {
        const yearSelect = document.getElementById("sheetYear");
        const currentYear = new Date().getFullYear();
        for (let y = currentYear - 5; y <= currentYear + 5; y++) {
            const opt = document.createElement("option");
            opt.value = y;
            opt.text = y;
            if (y === currentYear) opt.selected = true;
            yearSelect.appendChild(opt);
        }
    }

    function addStudent() {
        let name = document.getElementById("newStudent").value.trim();
        if (name && !students.includes(name)) { // Prevent adding duplicate names
            students.push(name);
            localStorage.setItem("students", JSON.stringify(students));
            document.getElementById("newStudent").value = "";
            renderTable();
        } else if (name) {
            alert("Student name already exists!");
        }
    }

    function renderTable() {
        const monthKey = getMonthKey();
        const [month, year] = monthKey.split("_");
        const days =
            month === "February" && (year % 4 === 0 && (year % 100 !== 0 || year % 400 === 0))
                ? 29
                : daysInMonth[month];

        let table = document.getElementById("attendanceTable");
        let thead = table.querySelector("thead tr");
        let tbody = document.getElementById("studentRows");

        thead.innerHTML = "<th>Name</th>";
        tbody.innerHTML = "";

        for (let i = 1; i <= days; i++) {
            const isHoliday = holidays[monthKey] && holidays[monthKey][i];
            const thClass = isHoliday ? 'holiday-column' : '';
            thead.innerHTML += `<th class="${thClass}">
                                    ${i}<br>
                                    <label class="holiday-label">
                                        <input type='checkbox' data-day='${i}' ${isHoliday ? 'checked' : ''} onchange='toggleHoliday(this.dataset.day, this.checked)'> <span>Holiday</span>
                                    </label>
                                </th>`;
        }

        students.forEach((student) => {
            let tr = document.createElement("tr");
            let row = `<td>${student}</td>`; // Removed the delete button here
            for (let i = 1; i <= days; i++) {
                const checked = attendance[monthKey]?.[student]?.[i] ? "checked" : "";
                const isHoliday = holidays[monthKey] && holidays[monthKey][i];
                const cellClass = isHoliday ? 'holiday-column' : '';
                const disabled = isHoliday ? 'disabled' : '';
                row += `<td class="${cellClass}"><input type='checkbox' ${checked} ${disabled} onchange='markAttendance("${student}", ${i}, this.checked)'></td>`;
            }
            tr.innerHTML = row;
            tbody.appendChild(tr);
        });
        applyHolidayStyling();
    }

    function toggleHoliday(day, isHoliday) {
        day = parseInt(day);
        const monthKey = getMonthKey();
        holidays[monthKey] = holidays[monthKey] || {};
        holidays[monthKey][day] = isHoliday;
        localStorage.setItem("holidays", JSON.stringify(holidays));

        const table = document.getElementById("attendanceTable");
        const headerCells = table.querySelector("thead tr").children;
        const thForDay = headerCells[day];

        if (thForDay) {
            if (isHoliday) {
                thForDay.classList.add('holiday-column');
            } else {
                thForDay.classList.remove('holiday-column');
            }
        }

        applyHolidayStyling();
    }

    function applyHolidayStyling() {
        const monthKey = getMonthKey();
        const table = document.getElementById("attendanceTable");
        const headerCells = table.querySelector("thead tr").children;
        const bodyRows = table.querySelector("tbody").children;

        for (let i = 1; i < headerCells.length; i++) {
            const day = i;
            const isHoliday = holidays[monthKey] && holidays[monthKey][day];
            const thForDay = headerCells[i];

            if (isHoliday) {
                thForDay.classList.add('holiday-column');
            } else {
                thForDay.classList.remove('holiday-column');
            }

            for (let j = 0; j < bodyRows.length; j++) {
                const dataCell = bodyRows[j].children[i];
                const checkbox = dataCell.querySelector('input[type="checkbox"]');
                if (isHoliday) {
                    dataCell.classList.add('holiday-column');
                    if (checkbox) {
                        checkbox.checked = true;
                        checkbox.disabled = true;
                        if (attendance[monthKey] && attendance[monthKey][students[j]]) {
                             attendance[monthKey][students[j]][day] = false;
                        }
                    }
                } else {
                    dataCell.classList.remove('holiday-column');
                    if (checkbox) {
                        checkbox.disabled = false;
                        if (attendance[monthKey] && attendance[monthKey][students[j]]) {
                             checkbox.checked = attendance[monthKey][students[j]][day] || false;
                        } else {
                             checkbox.checked = false;
                        }
                    }
                }
            }
        }
        saveAttendance();
    }

    function markAttendance(name, day, present) {
        const monthKey = getMonthKey();
        attendance[monthKey] = attendance[monthKey] || {};
        attendance[monthKey][name] = attendance[monthKey][name] || {};
        attendance[monthKey][name][day] = present;
    }

    function saveAttendance() {
        localStorage.setItem("monthlyAttendance", JSON.stringify(attendance));
        localStorage.setItem("holidays", JSON.stringify(holidays));
        document.getElementById("message").textContent = "Attendance saved successfully!";
        setTimeout(() => {
            document.getElementById("message").textContent = "";
        }, 3000);
    }

    function printSheet() {
        window.print();
    }

    function calculateAttendancePercentage() {
        const fromDateInput = document.getElementById("fromDate").value;
        const toDateInput = document.getElementById("toDate").value;

        if (!fromDateInput || !toDateInput) {
            alert("Please select both From and To dates using the calendar.");
            return;
        }

        const fromDate = new Date(fromDateInput);
        const toDate = new Date(toDateInput);

        fromDate.setHours(0, 0, 0, 0);
        toDate.setHours(0, 0, 0, 0);

        if (fromDate > toDate) {
            alert("Invalid date range: 'From' date cannot be after 'To' date.");
            return;
        }

        const monthKey = getMonthKey();
        if (!attendance[monthKey]) {
            alert("No attendance data for the selected month/year.");
            return;
        }

        let result = `Attendance Percentage from ${fromDateInput} to ${toDateInput}:\n\n`;
        students.forEach((student) => {
            let presentDays = 0;
            let totalWorkingDays = 0;

            for (
                let d = new Date(fromDate);
                d <= toDate;
                d.setDate(d.getDate() + 1)
            ) {
                const dMonth = d.toLocaleString("default", { month: "long" });
                const dYear = d.getFullYear().toString();

                if (`${dMonth}_${dYear}` !== monthKey) {
                    continue;
                }

                const dayNum = d.getDate();
                if (!(holidays[monthKey] && holidays[monthKey][dayNum])) {
                    totalWorkingDays++;
                    if (attendance[monthKey][student] && attendance[monthKey][student][dayNum]) {
                        presentDays++;
                    }
                }
            }

            const percentage = totalWorkingDays ? ((presentDays / totalWorkingDays) * 100).toFixed(2) : "N/A";
            result += `${student}: ${percentage}%\n`;
        });

        alert(result);
    }

    function loadMonth() {
        renderTable();
    }

    // Initialize
    populateYears();
    loadMonth();
</script>

</body>
</html>