
 var clients = storedTasks;

    $("#jsGrid").jsGrid({
        width: "100%",
        height: "400px",

        inserting: true,
        editing: true,
        sorting: true,
        paging: true,

        data: clients,

        fields: [{
                name: "Name",
                type: "text",
                width: 150,
                validate: "required"
            },
            {
                name: "Created_At",
                type: "text",
                width: 200
            },
            {
                name: "Updated_At",
                type: "text",
                width: 200
            },
            {
                name: "Revision_Status",
                type: "checkbox",
                title: "revised",
                sorting: false
            },
            {
                type: "control"
            }
        ]
    });
    
    $("#sort").click(function() {
        var field = $("#sortingField").val();
        $("#jsGrid").jsGrid("sort", field);
    });
