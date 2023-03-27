beforeEach(()=> {
    cy.visit('http://mysite.test/')
})

// login
it('should be able to login', () => {
    cy.viewport(1200, 1000)
    cy.get('.common-links-nav').contains('Log in').click()
    cy.url().should('include', '/wp-login')
    cy.wait(500)
    cy.get('#user_login').click()
    
    .type('jkette01', { delay: 100 })
    .should('have.value', 'jkette01')
    cy.get('#user_pass').click()
    .type('guesswho', { delay: 100 })
    .should('have.value', 'guesswho')
    cy.get('#wp-submit').click()
    cy.url().should('include', '/wp-admin')  
})