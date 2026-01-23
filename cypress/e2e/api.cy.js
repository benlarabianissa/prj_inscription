describe('Test API User', () => {
  it('devrait créer un utilisateur', () => {
    cy.fixture('users/createUser').then((user) => {
  cy.request('POST', '/api/users', user).then((response) => {
    expect(response.status).to.eq(201);
});}); });
  it('devrait récupérer la liste des utilisateurs', () => {
    cy.request('GET', '/api/users').then((response) => {
      expect(response.status).to.eq(200);
      expect(response.body).to.be.an('array');
    });
  });
});
