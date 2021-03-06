/**
 * Created by taevis on 11/8/14.
 */
angular.module('selectConfig',[]).config(['uiSelectConfig', function(uiSelectConfig) {
    uiSelectConfig.theme = 'bootstrap';
}])
    .filter('byCustomerName', function(){
        "use strict";
        return function(customers, searchCorpus){
            var items = {
                searchString : searchCorpus,
                out: []
            };
            angular.forEach(customers, function(value){
                if((value.name_first.toLowerCase().indexOf(this.searchString.toLowerCase()) > -1) || (value.name_last.toLowerCase().indexOf(this.searchString.toLowerCase()) > -1) || ((value.name_first+' '+value.name_last).toLowerCase().indexOf(this.searchString.toLowerCase()) > -1) || ((value.name_last+', '+value.name_first).toLowerCase().indexOf(this.searchString.toLowerCase()) > -1)){
                    this.out.push(value);
                }
            }, items);
            return items.out;
        };
    }).filter('byCustomerCar', function(){
    "use strict";
        return function(vehicles, searchCorpus){
            var items = {
                searchString : searchCorpus,
                out:[]
            };
            angular.forEach(vehicles, function(value){
                if((value.owner.name_first.toLowerCase().indexOf(this.searchString.toLowerCase()) > -1) || (value.owner.name_last.toLowerCase().indexOf(this.searchString.toLowerCase()) > -1) || ((value.owner.name_first+' '+value.owner.name_last).toLowerCase().indexOf(this.searchString.toLowerCase()) > -1) || ((value.owner.name_last+', '+value.owner.name_first).toLowerCase().indexOf(this.searchString.toLowerCase()) > -1)|| value.VIN.indexOf(this.searchString.toLowerCase()) > -1){
                    this.out.push(value);
                }
            }, items);
            return items.out;
        }
    });