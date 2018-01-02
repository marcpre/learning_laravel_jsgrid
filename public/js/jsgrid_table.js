    /* var clients = [{
            "Name": "Otto Clay",
            "Age": 25,
            "Country": 1,
            "Address": "Ap #897-1459 Quam Avenue",
            "Married": false
        },
        {
            "Name": "Connor Johnston",
            "Age": 45,
            "Country": 2,
            "Address": "Ap #370-4647 Dis Av.",
            "Married": true
        },
        {
            "Name": "Lacey Hess",
            "Age": 29,
            "Country": 3,
            "Address": "Ap #365-8835 Integer St.",
            "Married": false
        },
        {
            "Name": "Timothy Henson",
            "Age": 56,
            "Country": 1,
            "Address": "911-5143 Luctus Ave",
            "Married": true
        },
        {
            "Name": "Ramona Benton",
            "Age": 32,
            "Country": 3,
            "Address": "Ap #614-689 Vehicula Street",
            "Married": false
        }
    ];
*/
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
                name: "Revision Status",
                type: "checkbox",
                title: "revised",
                sorting: false
            },
            {
                type: "control"
            }
        ]
    });
