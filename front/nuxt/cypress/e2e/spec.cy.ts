// describe('assert register', () => {
//   it('register', () => {
//     cy.visit('http://localhost/login')
//     cy.contains('Crear compte').click()
//     cy.get('input[id=nom]').type(`nomTest`)
//     cy.get('input[id=cognoms]').type(`cognomTest`)
//     cy.get('input[id=email]').type(`correuTest@test.com`)
//     cy.get('input[id=password]').type(`passwordTest`)
//     cy.get('input[id=password-repeat]').type(`passwordTest`)
//     cy.contains('Registrar-se').click()
//     cy.url().should('include', '/login')
//   })
// })

describe('Test de compra con sesión', () => {
  beforeEach(() => {
    cy.visit('http://localhost/login')
    cy.get('input[id=email]').type(`correuTest@test.com`)
    cy.get('input[id=password]').type(`passwordTest`)
    cy.contains('Iniciar sessió').click()
    cy.url().should('eq', 'http://localhost/')
  })

  it('Realizar compra', () => {
    cy.visit('http://localhost/')
    cy.get('.swal2-confirm').click(); 
  })

  // it('Ir al mapa', () => {
  //   cy.visit('http://localhost/')
  //   cy.get('#redirectToMap').click()
  // })
})