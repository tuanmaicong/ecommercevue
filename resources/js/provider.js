export function getUrlList(){
    const baseUrl = 'http://laravelandvue.test/api';
    return {
        getHeaderCategoriesData : ''+baseUrl+'/getCategoriesData',
        getHomeData : ''+baseUrl+'/getHomeData',
        getCategoryData: ''+baseUrl+'/getCategoryData',
        getProductData: ''+baseUrl+'/getProductData',
        getUserData: ''+baseUrl+'/getUserData',
        getCartData: ''+baseUrl+'/getCartData',
        addToCart: ''+baseUrl+'/addToCart',
        removeCartData: ''+baseUrl+'/removeCartData',
    }
}
export default getUrlList;
