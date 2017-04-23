export namespace Heading {
  export enum Types {
    H1, H2,
    H3, H4,
    H5, H6
  }

  export const styles = new Map<Types, React.CSSProperties>()

  const basis: React.CSSProperties = {
    fontFamily: 'Roboto',
    fontWeight: 300,

    margin: 0,
    padding: 0
  }

  styles.set(Types.H1, { ...basis, fontSize: '2rem' })
  styles.set(Types.H2, { ...basis, fontSize: '1.5rem' })
  styles.set(Types.H3, { ...basis, fontSize: '1.17rem' })
  styles.set(Types.H4, { ...basis, fontSize: '1rem' })
  styles.set(Types.H5, { ...basis, fontSize: '0.83rem' })
  styles.set(Types.H6, { ...basis, fontSize: '0.67rem' })
}
