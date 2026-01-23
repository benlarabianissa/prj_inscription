describe('Connexion utilisateur', () => {
  it('devrait afficher la page de connexion', () => {
    cy.visit('/login');
    cy.get('input[name=email]').should('be.visible');
  });
});