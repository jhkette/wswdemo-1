beforeEach(()=> {
    cy.visit('http://mysite.test/')
})


it('Log in', () => {
    cy.viewport(1200, 1000)
    cy.get('.common-links-nav').contains('Log in').click()
    cy.url().should('include', '/wp-login')
    cy.get('#user_login')
  
    .type(' jkette01', { delay: 500 })
    .should('have.value', 'jkette01')
    cy.get('#user_pass')
    .type('guesswho', { delay: 100 })
    .should('have.value', 'guesswho')
    cy.get('#wp-submit').click()
    cy.url().should('include', '/wp-admin')
    
  })