import React from 'react'
import Layout from '../../common/Layout'
import UserSidebar from '../../common/UserSidebar'
import { Link } from 'react-router-dom'

const ChangePassword = () => {
  return (
    <Layout>
      <section className='section-4'>
        <div className='container'>
            <div className='row'>
                <div className='col-md-12 mt-5 mb-3'>
                    <div className='d-flex justify-content-between'>
                        <h2 className='h4 mb-0 pb-0'>Chabge Password</h2>
                    </div>
                </div>
                <div className='col-lg-3 account-sidebar'>
                    <UserSidebar/>
                </div>
                <div className='col-lg-9'>
                    
                </div>
            </div>
        </div>
    </section>
    </Layout>
  )
}

export default ChangePassword
