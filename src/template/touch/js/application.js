var instance = Ext.ModelMgr.create({
		id: 1,
		name: 'Steffen',
		enabled: true,
	}, 'Person'
);

new Ext.Application({
    launch: function() {
        new Ext.Panel({
            fullscreen: true,
            dockedItems: [
                          {
	                          dock: 'top',
	                          xtype: 'toolbar',
	                          title: 'Foodalizr',
                          },
                          {
	                          dock: 'bottom',
	                          xtype: 'toolbar',
	                          ui: 'light',
	                          items: [
	                                  {
	                                  	text: 'Test Button'
	                                  }
	                                  ]
                          }
            ]
        });
    }
});
