myNoti = {
    misc: {
        navbar_menu_visible: 0
    },

    showNotification: function(from, align,noteOptions) {
        color = 'primary';

        $.notify({
            icon: "now-ui-icons ui-1_bell-53",
            message: noteOptions.body,
            url:noteOptions.click_action,
            target:"_self"

        }, {
            type: color,
            timer: 1000000000,
            placement: {
                from: from,
                align: align
            }
        });
    }


};