$(document).ready(function () {
    if ($("#conge_table").length) {
        $("#conge_table").DataTable({
            language: {
                searchPlaceholder: "Recherche agent en congé...",
                sSearch: "",
            },
            dom: "Bfrtip",
            buttons: ["copy", "csv", "excel", "pdf", "print"],
        });
    }
    if ($("#agent_table").length) {
        $("#agent_table").DataTable({
            language: {
                searchPlaceholder: "Recherche agent...",
                sSearch: "",
            },
            dom: "Bfrtip",
            buttons: ["copy", "csv", "excel", "pdf", "print"],
        });
    }
    if ($("#reports_table").length) {
        $("#reports_table").DataTable({
            language: {
                searchPlaceholder: "Recherche agent...",
                sSearch: "",
            },
            dom: "Bfrtip",
            buttons: ["copy", "csv", "excel", "pdf", "print"],
        });
    }
});
