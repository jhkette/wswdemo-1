// Cypress.on('uncaught:exception', () => false)
describe('My First Test', () => {
  it('clicking "type" navigates to a new url', () => {
    cy.visit('http://mysite.test/')
    cy.contains('Join').click()
    cy.url().should('include', '/join-us')


  })
})