function exportToExcel() {
    const table = document.querySelector('.formulario-table');
    const filename = 'tabela_formularios.xlsx';

    const wb = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });
    const wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'array' });

    const saveAs = (function (view) {
        const a = document.createElement("a");
        document.body.appendChild(a);
        a.style = "display: none";

        return function (data, fileName) {
            const url = view.URL.createObjectURL(new Blob([data], { type: "application/octet-stream" }));
            a.href = url;
            a.download = fileName;
            a.click();
            setTimeout(function () {
                view.URL.revokeObjectURL(url);
            }, 100);
        };
    }(window));

    saveAs(wbout, filename);
}
