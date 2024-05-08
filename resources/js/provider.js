export function getUrlList(){
    const baseUrl = 'http://laravelandvue.test/api';
    return {
        getHeaderCategoriesData : ''+baseUrl+'/getCategoriesData',
        getHomeData : ''+baseUrl+'/getHomeData',
        getCategoryData: ''+baseUrl+'/getCategoryData',
        getShopData: ''+baseUrl+'/getShopData',
        getProductData: ''+baseUrl+'/getProductData',
        getUserData: ''+baseUrl+'/getUserData',
        getCartData: ''+baseUrl+'/getCartData',
        addToCart: ''+baseUrl+'/addToCart',
        removeCartData: ''+baseUrl+'/removeCartData',
        register: ''+baseUrl+'/auth/register',
        login: ''+baseUrl+'/auth/login',
        logout: ''+baseUrl+'/auth/logout',
    }
}
export default getUrlList;
