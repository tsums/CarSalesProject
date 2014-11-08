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
                if((value.firstName.indexOf(this.searchString) > -1) || (value.lastName.indexOf(this.searchString) > -1) || ((value.firstName+' '+value.lastName).indexOf(this.searchString) > -1) || ((value.lastName+', '+value.firstName).indexOf(this.searchString) > -1)){
                    this.out.push(value);
                }
            }, items);
            return items.out;
        };
    });