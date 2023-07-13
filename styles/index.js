
	function calculate() {
	let table1Sum = 0;
	let table2Sum = 0;
	let table3Sum = 0;
  let table4Sum = 0;
	
	// calculate sum for table1
	let table1Rows = document.querySelectorAll('#table1 tr');
	table1Rows.forEach(row => {
	let rowSum = 0;
	let checkboxes = row.querySelectorAll('input[type="checkbox"]');
	checkboxes.forEach(checkbox => {
	if (checkbox.checked) {
	rowSum += parseInt(checkbox.value);
	}
	});
	table1Sum += rowSum;
	});
	
	// calculate sum for table2
	let table2Rows = document.querySelectorAll('#table2 tr');
	table2Rows.forEach(row => {
	let rowSum = 0;
	let checkboxes = row.querySelectorAll('input[type="checkbox"]');
	checkboxes.forEach(checkbox => {
	if (checkbox.checked) {
	rowSum += parseInt(checkbox.value);
	}
	});
	table2Sum += rowSum;
	});
	
	// calculate sum for table3
	let table3Rows = document.querySelectorAll('#table3 tr');
	table3Rows.forEach(row => {
	let rowSum = 0;
	let checkboxes = row.querySelectorAll('input[type="checkbox"]');
	checkboxes.forEach(checkbox => {
	if (checkbox.checked) {
	rowSum += parseInt(checkbox.value);
	}
	});
	table3Sum += rowSum;
	});
		// calculate sum for table1
	let table4Rows = document.querySelectorAll('#table4 tr');
	table4Rows.forEach(row => {
	let rowSum = 0;
	let checkboxes = row.querySelectorAll('input[type="checkbox"]');
	checkboxes.forEach(checkbox => {
	if (checkbox.checked) {
	rowSum += parseInt(checkbox.value);
	}
	});
	table4Sum += rowSum;
	});
	
	// compare sums and output result
	let output = document.getElementById('output');
let tableSums = [table1Sum, table2Sum, table3Sum, table4Sum];
tableSums.sort(function(a, b){return b-a});
let majorPersonality = '';
let minorPersonality = '';
if (tableSums[0] === table1Sum) {
    majorPersonality = 'CHOLERIC';
} else if (tableSums[0] === table2Sum) {
    majorPersonality = 'PHLEGMATIC';
} else if (tableSums[0] === table3Sum) {
    majorPersonality = 'MELANCHOLY';
} else if (tableSums[0] === table4Sum) {
    majorPersonality = 'SANGUINE';
}
if (tableSums[1] === table1Sum) {
    minorPersonality = 'CHOLERIC';
} else if (tableSums[1] === table2Sum) {
    minorPersonality = 'PHLEGMATIC';
} else if (tableSums[1] === table3Sum) {
    minorPersonality = 'MELANCHOLY';
} else if (tableSums[1] === table4Sum) {
    minorPersonality = 'SANGUINE';
}
if (majorPersonality === '' || minorPersonality === '') {
    output.innerHTML = 'Personality test Error';
} else {
    output.innerHTML = 'Your Major Personality is ' + majorPersonality + ' with a score of ' + tableSums[0] + ' and your Minor Personality is ' + minorPersonality + ' with a score of ' + tableSums[1];
}
}

