describe('Создание корзины', () => {
    let cartResult;
    before(async () => {
        cartResult = await createProduct({
            user_id: 'test',
            product: 'test',
            price: 'test',
        })
    });
    it('корзина для текущего пользователя создана', () => {
        assert.isDefined(cartResult);
    })
})