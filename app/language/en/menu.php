<?php

setLang(
    "menu",
    [
        "admin" => [
            [
                "label" => lang("dashboard"),
                "url" => url("dash"),
                "box" => "page-content",
                "icon" => "layout-grid",
                "active" => "true",

            ],
            [
                "label" => lang("customer"),
                "icon" => "user",


                "menu" => [
                    [
                        "label" => lang("new_customer"),
                        "url" => url("customer/getForm"),
                        "box" => "modal-add-box",
                        "title-to-change" => "#modal-add .title",
                        "modal" => "modal-add",
                        "icon" => "user-plus",

                    ],
                    [
                        "label" => lang("customers_list"),
                        "url" => url("customer"),
                        "box" => "page-content",
                        "title-to-change" => "page-title",
                        "icon" => "users",

                    ],
                    [
                        "label" => lang("machines"),
                        "url" => url("machine"),
                        "box" => "page-content",
                        "title-to-change" => "page-title",
                        "icon" => "wrench",

                    ]
                ]

            ],
            [
                "label" => lang("technicians"),
                "icon" => "hard-hat",

                "menu" => [
                    [
                        "label" => lang("new_technician"),
                        "url" => url("technician/getForm"),
                        "box" => "modal-add-box",
                        "title-to-change" => "#modal-add .title",
                        "modal" => "modal-add",
                        "icon" => "minus",

                    ],
                    [
                        "label" => lang("technicians_list"),
                        "url" => url("technician"),
                        "box" => "page-content",
                        "title-to-change" => "page-title",
                        "icon" => "minus",

                    ]
                ]

            ],
            [
                "label" => lang("intervention"),
                "icon" => "target",


                "menu" => [
                    [
                        "label" => lang("program_intervention"),
                        "url" => url("intervention/getForm"),
                        "box" => "page-content",
                        "title-to-change" => "page-title",
                        "icon" => "calendar-plus",

                    ],
                    [
                        "label" => lang("interventions_list"),
                        "url" => url("intervention"),
                        "box" => "page-content",
                        "title-to-change" => "page-title",
                        "icon" => "list",

                    ],
                    [
                        "label" => lang("products"),
                        "url" => url("product"),
                        "box" => "page-content",
                        "title-to-change" => "page-title",
                        "icon" => "boxes",

                    ]
                ]

            ],
            [
                "label" => lang("quote"),
                "icon" => "file",


                "menu" => [
                    [
                        "label" => lang("new_quote"),
                        "url" => url("quote/getForm"),
                        "box" => "page-content",
                        "title-to-change" => "page-title",
                        "icon" => "file-plus",

                    ],
                    [
                        "label" => lang("quotes_list"),
                        "url" => url("quote"),
                        "box" => "page-content",
                        "title-to-change" => "page-title",
                        "icon" => "minus",

                    ],
                    [
                        "label" => lang("invoice"),
                        "url" => url("invoice"),
                        "box" => "page-content",
                        "title-to-change" => "page-title",
                        "icon" => "file",

                    ]
                ]

            ],
            [
                "label" => lang("tutorials"),
                "url" => url("tutorial"),
                "box" => "page-content",
                "title-to-change" => "page-title",
                "icon" => "camera",
                "bottom" => "",

            ],
            [
                "label" => lang("settings"),
                "url" => url("setting"),
                "box" => "page-content",
                "title-to-change" => "page-title",
                "icon" => "settings",
                "bottom" => "",

            ],
            [
                "label" => lang("logout"),
                "icon" => "log-out",
                "bottom" => "",
                "modal" => "logout_modal",

            ]
        ],
        "technician" => [
            [
                "label" => lang("dashboard"),
                "url" => url("dash"),
                "box" => "page-content",
                "icon" => "layout-grid"
            ],
            [
                "label" => lang("logout"),
                "icon" => "log-out",
                "bottom" => "",
                "modal" => "logout_modal",

            ]
        ],
        "customer" => [
            [
                "label" => lang("dashboard"),
                "url" => url("dash"),
                "box" => "page-content",
                "icon" => "layout-grid",
                "active" => "true",
                "title-to-change" => "page-title",

            ],
            [
                "label" => lang("machines"),
                "url" => url("machine"),
                "box" => "page-content",
                "icon" => "wrench",
                "title-to-change" => "page-title",

            ],
            [
                "label" => lang("settings"),
                "url" => url("setting"),
                "box" => "page-content",
                "title-to-change" => "page-title",
                "icon" => "settings",
                "bottom" => "",

            ],
            [
                "label" => lang("logout"),
                "icon" => "log-out",
                "bottom" => "",
                "modal" => "logout_modal",

            ]

        ]
    ]
);
