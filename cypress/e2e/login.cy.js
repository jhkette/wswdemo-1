beforeEach(()=> {
    cy.visit('http://mysite.test/')
})

// nb these tests run against a local site - password is for local site obviously 
// login test - goes to login - types in credentials
it('should be able to login', () => {
    // viewport size
    cy.viewport(1200, 1000)
    // got to commonlinks and login
    cy.get('.common-links-nav').contains('Log in').click()
    // correct url should appear
    cy.url().should('include', '/wp-login')
    cy.wait(500)
    
    cy.get('#user_login').click()
    // type username
    .type('test1', { delay: 100 })
    .should('have.value', 'test1')

    cy.get('#user_pass').click()
    // type password
    .type('hello4horse', { delay: 100 })
    .should('have.value', 'hello4horse')
    // click submit
    cy.get('#wp-submit').click()
    // url should be /wp-adming
    cy.url().should('include', '/wp-admin')  
})

