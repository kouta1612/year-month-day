function setDay() {
    const year = document.getElementById('year').value;
    const month = document.getElementById('month').value;

    let dayOption = '<option value="">---</option>';
    if (year !== '' && month !== '') {
        const lastDay = (new Date(year, month, 0)).getDate();
        for (let day = 1; day <= lastDay; day++) {
            dayOption += '<option value="' + day + '">' + day + '</option>';
        }
    }
    document.getElementById('day').innerHTML = dayOption;
};

window.onload = function () {
    setDay();
    document.getElementById('year').addEventListener('change', setDay);
    document.getElementById('month').addEventListener('change', setDay);

    const day = document.getElementById('day');
    day.value = day.getAttribute('data-old-value');
}
