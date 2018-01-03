$(function () {

    $("#jsGrid").jsGrid({
        width: "100%",
        height: "400px",
        
        filtering: true,
        inserting: true,
        editing: true,
        sorting: true,
        paging: true,
        autoload: true,

        data: storedTasks,
        controller: {
            loadData: function(filter) {
                console.log("Filter: "+ filter)
                return $.ajax({
                    type: "GET",
                    url: "/tasks/",
                    data: storedTasks
                });
            },
            insertItem: function(item) {
                console.log("item: " + item)
                return $.ajax({
                    type: "POST",
                    url: "/tasks/",
                    data: storedTasks
                });
            },
            updateItem: function(item) {
                return $.ajax({
                    type: "PUT",
                    url: "/tasks/",
                    data: item
                });
            },
            deleteItem: function(item) {
                return $.ajax({
                    type: "DELETE",
                    url: "/tasks/",
                    data: item
                });
            }
        },
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
                name: "revision_status",
                type: "checkbox",
                title: "Revision Status",
                sorting: false
            },
            {
                type: "control"
            }
        ]
    });
});
